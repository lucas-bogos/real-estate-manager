CREATE TABLE immobile (
    ImmobileID int UNSIGNED AUTO_INCREMENT,
    value int NOT NULL,
    address VARCHAR(255) NOT NULL,
    room int NOT NULL,
    ApartamentID int UNSIGNED,
    HouseID int UNSIGNED,
    PRIMARY KEY (ImmobileID),
    FOREIGN KEY (ApartamentID) REFERENCES apartament(ApartamentID),
    FOREIGN KEY (HouseID) REFERENCES house(HouseID)
);