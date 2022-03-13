import faker from 'faker';
import { sample } from 'lodash';
// utils
import { mockImgAvatar } from '../utils/mockImages';

// ----------------------------------------------------------------------

const users = [...Array(24)].map((_, index) => ({
  id: sample([
    '32','20','40','50','30'
  ]),
  Address: sample([
    '1234 Smith St',
    '1468 Cougar St',
    '1400 University Dr',
    '555 Houston St',
    '9898 Luis St'
  ]),
  timestamp: sample([
    '01-01-2022',
    '03-10-2021',
    '09-24-2020',
    '02-17-2022',
    '07-04,2021'
  ]),
  role: sample([
    '$100',
    '$50',
    '69',
    '70',
    '85'
  ])
}));

export default users;
