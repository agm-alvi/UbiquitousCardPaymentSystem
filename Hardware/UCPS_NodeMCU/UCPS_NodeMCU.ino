#include <ArduinoJson.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>


#define WIFI_SSID "OnePlus-6"                                             // input your home or public wifi name 
#define WIFI_PASSWORD "12345789"
int Led_OnBoard = 2;
const char *host = " 192.168.43.35";

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);

  // connect to wifi.
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    digitalWrite(Led_OnBoard, HIGH);

    delay(500);
  }
  Serial.println();
  Serial.print("connected: ");
  Serial.println(WiFi.localIP());



}

void loop() {
  Serial.println("Finding.....");
  if (Serial.available() > 0)
  {
    StaticJsonBuffer<1000> jsonBuffer;
    JsonObject& doc = jsonBuffer.parseObject(Serial);


    int id = doc["id"];
    double amount = doc["amount"];
    String user = doc["user"];
    String platform = doc["platform"];
    Serial.println(id);
    Serial.println(amount);
    Serial.println(user);
    Serial.println(platform);
    delay(500);
    // put your main code here, to run repeatedly:
    HTTPClient http;    //Declare object of class HTTPClient

    String  postData;
    String idValue,  amountValue;
   // platform = "TB";
    idValue = String(id);
    amountValue = String(amount);
    postData = "id=" + idValue + "&uAccountNo=" + user + "&amount=" + amountValue + "&platform="+platform;
    http.begin("http://192.168.43.35/UbiquitousCardPaymentSystem/Webpage/insertDB.php");              //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload

    //Serial.println("LDR Value=" + ldrvalue);
    Serial.print("httpcode ");
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println("payload ");
    Serial.println(payload);    //Print request response payload
    Serial.println(postData);
    http.end();  //Close connection
    delay(4000);  //Here there is 4 seconds delay plus 1 second delay below, so Post Data at every 5 seconds
    digitalWrite(Led_OnBoard, LOW);
    delay(1000);
    digitalWrite(Led_OnBoard, HIGH);
  }
}
