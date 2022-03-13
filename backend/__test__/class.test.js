const test_dev = require('../classes/PricingModule');

describe('test Class', () => {
    test('Testing Gallons funtions', () => {
        expect(test_dev.prototype.setgallons(10));
        expect(test_dev.prototype.getGallons()).toBe(10);
    });
    test('Testing Location functions', () => {
        expect(test_dev.prototype.setlocation('Houston'));
        expect(test_dev.prototype.getLocation()).toBe('Houston');
    });
    test('Testing Price functions', () => {
        expect(test_dev.prototype.setgallons(10));
        expect(test_dev.prototype.getPrice()).toBe(38);
    });
});