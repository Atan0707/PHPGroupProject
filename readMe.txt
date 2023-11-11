Gerai 13 (Version 1.14)

1. Create database gerai_13 -> buat table baru nama user
- id buat auto increment
- username varchar 100
- password varchar 100
- phone varchar 20

2. Masukkan code ni dlm sql database productdb -> producttb

INSERT INTO producttb (product_name, product_price, product_image) VALUES
('American Burger', 10, '.assets/img/American-Burger.jpg'),
('BigMac', 10, '.assets/img/BigMac.jpg'),
('Chicken Katsu Burger', 10, '.assets/img/Chicken-Katsu-Burger.jpg'),
('Grilled Chicken Burger With Sambal Sause', 10, '.assets/img/Grilled-Chiken-burger-with-sambal-sauce.jpg'),
('Korean Burger', 11, '.assets/img/Korean-Burger.jpg'),
('Ocean Cheese Burger', 12, '.assets/img/ocean-cheese-burger.jpg'),
('Round-Chicken Burger', 14, '.assets/img/Round-Chicken-Burger.jpg'),
('Smokey Beef Burger', 10, '.assets/img/Smokey-Beef-Burger.jpg'),
('Triple Mini Burger + Wedges', 15, '.assets/img/Triple-Mini-Burger-wedges.jpg'),   
('Filet-O-Fish Burger', 15, '.assets/img/Keto-Fish-Burger.jpg'),
('Caramelized Onion Burger', 10, '.assets/img/caramelized-onion-burger.jpg'),
('Chicken Burger With Egg', 15, '.assets/img/egg-burger.jpg')

3. create new table nama bukti dekat dalam database gerai_13
- id buat auto increment
- qr varchar 100
