int soilMoistureValue;    //variable for mosture value
int soilMoisturePercent;    //variable for moisture percent
const int airValue = 532;   //value measured by sensor in the air
const int waterValue = 285;   //value measured by sensor in the pure water

char input_command;  //character with command received

void setup() {
Serial.begin(9600);   //initialize serial;
pinMode(2, OUTPUT);   //set pin 2 for output;
}

void loop() {

  digitalWrite(2, HIGH);       //set pin 2 value to high to disable water pump

 if (Serial.available()){
    input_command = Serial.read();    //reads input character send over serial if something is available into input_command
    switch(input_command)                   //switch for the different input commands
    {
      case 'a':
      Moisture_measure();                   //executes function Distance_measure;
      break;

      case 'b':
      Watering();                           //executes function Watering;
      break;
    }
  }
}


void Moisture_measure(){                    //function to measure the moisture using the sensor
  
  soilMoistureValue = analogRead(A0);               //read analog value from sensor
  soilMoisturePercent = map(soilMoistureValue, airValue, waterValue, 0, 100);         //convert value to percent
  if(soilMoisturePercent > 100)
  {
    Serial.println("100");
    }
  else if(soilMoisturePercent <0)
  {
    Serial.println("0");
    }
  else if(soilMoisturePercent > 0 && soilMoisturePercent < 100)
  {
    Serial.println(soilMoisturePercent);
    }
    delay(5000);
}

void Watering(){      
 
  digitalWrite(2, LOW);         //set pin 2 value to low as far as relay is normally closed
  delay(9000);                       //keep pin low for 9 seconds (watering)
  digitalWrite(2, HIGH);       //set pin 2 value back to high to disable water pump
}
