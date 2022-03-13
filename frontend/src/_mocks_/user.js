import faker from 'faker';
import { ceil, random, sample } from 'lodash';
// utils
import { mockImgAvatar } from '../utils/mockImages';

// ----------------------------------------------------------------------

// const users = [...Array(24)].map((_, index) => ({
//   gallonsRequested: sample([
//     '32',
//     '20',
//     '40',
//     '50',
//     '30'
//   ]),
//   deliveryAddress: sample([
//     '1234 Smith St',
//     '1468 Cougar St',
//     '1400 University Dr',
//     '555 Houston St',
//     '9898 Luis St'
//   ]),
//   deliveryDate: sample([
//     '01-01-2022',
//     '03-10-2021',
//     '09-24-2020',
//     '02-17-2022',
//     '07-04,2021'
//   ]),
//   suggestedPrice: sample([
//     '$100',
//     '$50',
//     '69',
//     '70',
//     '85'
//   ])
// }));

// class DeliveryData {
//   constructor(userID, gallonsRequested, deliveryAddress, deliveryDate, suggestedPrice) {
//     this.userID = userID;
//     this.gallonsRequested = gallonsRequested;
//     this.deliveryAddress = deliveryAddress;
//     this.deliveryDate = deliveryDate;
//     this.suggestedPrice = suggestedPrice;
//   }
// };

const gallonsMockList = [
  '32',
  '20',
  '40',
  '50',
  '30'
];

const addressMockList = [
  '1234 Smith St',
  '1468 Cougar St',
  '1400 University Dr',
  '555 Houston St',
  '9898 Luis St'
];

const dateMockList = [
  '01-01-2022',
  '03-10-2021',
  '09-24-2020',
  '02-17-2022',
  '07-04,2021'
];

const priceMockList = [
  '100',
  '50',
  '69',
  '70',
  '85'
];


// Named users, but actually generates a list of orders
const users = [...Array(24)].map((_, index) => ({
  userID: sample(['1', '2', '3']),
  orderID: index.toString(),
  gallonsRequested: sample(gallonsMockList), 
  deliveryAddress: sample(addressMockList),
  deliveryDate: sample(dateMockList),
  suggestedPrice: sample(priceMockList)
}));

export default users;
