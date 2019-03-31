DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS partie;
DROP TABLE IF EXISTS user;


CREATE TABLE images (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    url VARCHAR(255),
    lat DOUBLE,
    lon DOUBLE,
    ville VARCHAR(255)
);

CREATE TABLE partie (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    utilisateur VARCHAR(255),
    ville VARCHAR(255),
    score INT,
    etat VARCHAR(255)
);

CREATE TABLE user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    identifiant VARCHAR(255),
    mdp VARCHAR(255)
);


INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "lyon", "https://blogoth67.files.wordpress.com/2012/03/liondebelfort.jpg", 47.636827, 6.864570, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "monoprix", "https://cdn-s-www.estrepublicain.fr/images/7212FDE2-17D5-4E93-A040-26D89C74C9EB/LER_22/title-1433506900.jpg", 47.637876, 6.859066, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "mairie", "http://www.patrimoine-horloge.fr/images/Belfort_mairie%20(1).jpg", 47.638098, 6.862931, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "iut", "http://actu.univ-fcomte.fr/sites/default/files/styles/sticky_12_cols_840x400/public/iut-belfort-2_0.jpg?itok=NNq5yGI6", 47.643295, 6.839146, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "utbm", "https://www.utbm.fr/wp-content/uploads/2015/04/site-belfort.jpg", 47.641683, 6.843867, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "gymnase", "https://sport.belfort.fr/fileadmin/_processed_/9/d/csm_le_phare_ffc58ae2c8.jpg",  47.638976, 6.849674, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "4as", "https://cdn.radiofrance.fr/s3/cruiser-production/2016/07/f44aa00b-e90c-40f4-ae97-c4b320ce9cd3/870x489_les_4_as.jpg", 47.639142, 6.855150, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "maison_peuple", "http://cdn.sit.franche-comte.org/25d5f664e1ccb565050d8e9ee8985c40.jpg", 47.641614, 6.851513, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "skatepark", "http://www.constructo.fr/wp-content/gallery/belfort/belfort_08.jpg", 47.656691, 6.855676, "Belfort");
INSERT INTO images (id, nom, url, lat, lon, ville) VALUES (NULL, "poste", "https://img.20mn.fr/M3_ncqkNTWyGTUp08s-BXw/310x190_poste-faubourg-ancetres-belfort.jpg", 47.638734, 6.857237, "Belfort");


