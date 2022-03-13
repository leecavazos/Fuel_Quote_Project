function Pricing_Module(gallons, location) {
    this.gallons = gallons;
    this.location = location;
  }

  Pricing_Module.prototype.setgallons = function(gallons) {
      this.gallons = gallons;
  };

  Pricing_Module.prototype.setlocation = function(location) {
      this.locations = location;
  };

  Pricing_Module.prototype.getPrice = function(location) {
      // This function will get both the gallons and location from the user and will later calculate the Suggested Price
  };
  module.exports = Pricing_Module;