#include "libs.h"
#include "nRFLE.c"

int rf_read(unsigned char data[32]) {
		int r = 0;
		int count;
		rf_irq_clear_all(); //clear all interrupts in the 24L01
		rf_set_as_rx(true); //change the device to an RX to get the character back from the other 24L01

		//wait a while to see if we get the data back (change the loop maximum and the lower if
		//  argument (should be loop maximum - 1) to lengthen or shorten this time frame
	 //led_off();
		for(count = 0; count < 25000; count++)
		{
		  
			if((rf_irq_pin_active() && rf_irq_rx_dr_active()))
			{
			  //state=1;
//if (clientnf.count <= 2147483646) clientnf.count++;      /// счетчик передач для контроля качества канала
//else 		.count = 0;

				rf_read_rx_payload(data //(const uint8_t*)&servernf
				       , 32); //get the payload into data
				r=1;
				break;
			
			}
			//if loop is on its last iteration, assume packet has been lost.
			//if(count == 24999) clientnf.Error_Message++;
		}
		rf_irq_clear_all(); //clear interrupts again
		rf_set_as_tx(); //resume normal operation as a TX
		//led_off();
return r;	
}

void rf_write(unsigned char  data[32]) {
// led_on();
	//(const uint8_t*)&clientnf
	 	rf_write_tx_payload(data, 32, true); //transmit received char over RF
         delay_ms(1); 
		//wait until the packet has been sent or the maximum number of retries has been reached
		  //while(!(rf_irq_pin_active() && rf_irq_tx_ds_active())) delay_ms(1);  // zu - cleared by vovka
  //       led_off();
}

	void rf_init(int chan) {
		radiobegin(); //
		setChannel(chan);
		setDataRate(2); // 1 - 250кб , 2 - 1 мб , 3 -2 мб.
		setAutoAck(false);
		setCRCLength(2); // 0 - crc off ,1 - 8bit ,2 - 16bit
		setPALevel(3) ; // мощность 0..3
		openAllPipe();
		delay_ms(100);
	}

void main()
{
	//CLKCTRL=0;
  
	gpio_pin_configure(GPIO_PIN_ID_P1_5, GPIO_PIN_CONFIG_OPTION_DIR_OUTPUT | GPIO_PIN_CONFIG_OPTION_OUTPUT_VAL_CLEAR | GPIO_PIN_CONFIG_OPTION_PIN_MODE_OUTPUT_BUFFER_NORMAL_DRIVE_STRENGTH);
	gpio_pin_configure(GPIO_PIN_ID_P1_6, GPIO_PIN_CONFIG_OPTION_DIR_OUTPUT | GPIO_PIN_CONFIG_OPTION_OUTPUT_VAL_CLEAR | GPIO_PIN_CONFIG_OPTION_PIN_MODE_OUTPUT_BUFFER_NORMAL_DRIVE_STRENGTH);
	digitalWrite(GPIO_PIN_ID_P1_5, 1);

	rf_init(100); //open 100 chan (addreses already defined in nRLE.c)

	while(1)
	{
		unsigned char  d[32];

		if (rf_read(d)) { // send resp back  if we have recv OK
			//rf_write(d); //just echo back
			digitalWrite(GPIO_PIN_ID_P1_6, 1);
			delay_ms(100);
			digitalWrite(GPIO_PIN_ID_P1_6, 0);
		}

		delay_ms(1);
	} //end loop
}
