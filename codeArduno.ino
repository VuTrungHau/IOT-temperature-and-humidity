#ifdef ESP32
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif

#include <Wire.h>
#include "DHT.h"
#define DHTTYPE DHT11      
#define DHTPIN 5

const char* ssid     = "42/14 HBD";
const char* password = "khongcobiet";

DHT dht(DHTPIN, DHTTYPE);
void setup() {
  Serial.begin(9600);
  
  WiFi.mode(WIFI_OFF);
  delay(1000);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  Serial.print("\n\n");
  Serial.print("Try to connect to WiFi. Please wait! ");
  Serial.print("\n\n");

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print("*");
  }
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());


}
void loop() {
  
  WiFiServer server(80);
  WiFiClient wifiClient;
  HTTPClient http;
    

  http.begin(wifiClient, "http://192.168.1.11:8080/sensordata/post-esp-data.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  

  String httpRequestData = "&value1=" + String(dht.readTemperature()) + "&value2=" + String(dht.readHumidity()) + "&value3=" + String(dht.readTemperature(true));
  Serial.print("httpRequestData: ");
  Serial.println(httpRequestData);
    
  int httpResponseCode = http.POST(httpRequestData);
     
  if (httpResponseCode>0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  }
  else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }

  http.end();
  delay(15000);  
}
