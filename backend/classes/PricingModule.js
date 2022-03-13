class Pricing_Module{
    Pricing_Module(gallons,location) {
      this.gallons = gallons;
      this.location = location;
    }
  
    setgallons(gallons) {
        this.gallons = gallons;
    };
  
    setlocation(location) {
        this.location = location;
    };
  
    getGallons(){
        return this.gallons;
    };
  
    getLocation(){
      return this.location;
    };
  
    getPrice() {
        // This function will get both the gallons and location from the user and will later calculate the Suggested Price
      const Price = (this.gallons*3.8);
      return Price;
    };
  }
    module.exports = Pricing_Module;