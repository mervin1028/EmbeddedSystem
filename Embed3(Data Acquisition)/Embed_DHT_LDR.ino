#include <stdlib.h>
#include <DHT.h>

#define DHTPIN 8 
#define DHTTYPE DHT11 
DHT dht(DHTPIN, DHTTYPE);

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  pinMode(A0, INPUT);
  dht.begin();
}

void loop() {
  // put your main code here, to run repeatedly:
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  //Compute heat index in Celsius (isFahrenheit = false)
  float hic = dht.computeHeatIndex(t,h,false);
  int ldrValue = analogRead(A0);
  
  Serial.print(h);
  Serial.print("|");
  Serial.print(t);
  Serial.print("|");
  Serial.print(ldrValue);
  Serial.print("|");
  Serial.println(hic);
  
  delay(3000);
}
