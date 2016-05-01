CREATE SCHEMA `inf124grp06`;
CREATE TABLE `inf124grp06`.`items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(800) NULL,
  `material` VARCHAR(100) NULL,
  `price` INT NOT NULL,
  `image1_url` VARCHAR(200) NULL,
  `image2_url` VARCHAR(200) NULL,
  `image3_url` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));
  
CREATE TABLE `inf124grp06`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
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
  
CREATE TABLE `inf124grp06`.`orders` (
  `orderNo` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT NOT NULL,
  `shipping_method` VARCHAR(45) NOT NULL,
  `total` INT NOT NULL,
  `inf124grp06_id` INT NOT NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`orderNo`),
  INDEX `customer_idx` (`customer_id` ASC),
  INDEX `inf124grp06_idx` (`inf124grp06_id` ASC),
  CONSTRAINT `customer`
    FOREIGN KEY (`customer_id`)
    REFERENCES `inf124grp06`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `inf124grp06`
    FOREIGN KEY (`inf124grp06_id`)
    REFERENCES `inf124grp06`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);