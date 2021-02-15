//Libraries
#include<SoftwareSerial.h>
#include <ArduinoJson.h>
int id = 603;
int amount = 500;
String user = "3F AD 4D 29";
String platform = "TB";
void setup() {
  Serial.begin(9600);
  pinMode(2, INPUT);

}

void loop() {

  StaticJsonDocument<1000> jsonBuffer;
  jsonBuffer["id"]=id;
  jsonBuffer["amount"]=amount;
  jsonBuffer["user"]=user;
  jsonBuffer["platform"]=platform;
  
  serializeJsonPretty(jsonBuffer,Serial);
  Serial1.println();
  delay(1000);

}
