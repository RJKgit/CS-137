CREATE SCHEMA `furniture` ;

CREATE TABLE `furniture`.`items` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(800) NULL,
  `material` VARCHAR(100) NULL,
  `price` INT NOT NULL,
  `image1_url` VARCHAR(200) NULL,
  `image2_url` VARCHAR(200) NULL,
  `image3_url` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));
  
CREATE TABLE `furniture`.`customers` (
  `id` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone_number` INT NOT NULL,
  `street_address` VARCHAR(100) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `zipcode` INT NOT NULL,
  `cc_number` INT NOT NULL,
  PRIMARY KEY (`id`));
  
CREATE TABLE `furniture`.`orders` (
  `orderNo` INT NOT NULL,
  `quantity` INT NOT NULL,
  `shipping_method` VARCHAR(45) NOT NULL,
  `total` INT NOT NULL,
  `furniture_id` INT NOT NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `customer_idx` (`customer_id` ASC),
  INDEX `furniture_idx` (`furniture_id` ASC),
  CONSTRAINT `customer`
    FOREIGN KEY (`customer_id`)
    REFERENCES `furniture`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `furniture`
    FOREIGN KEY (`furniture_id`)
    REFERENCES `furniture`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);