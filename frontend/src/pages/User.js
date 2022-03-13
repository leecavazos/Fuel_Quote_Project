import { filter } from 'lodash';
import { Icon } from '@iconify/react';
import { sentenceCase } from 'change-case';
import { useState } from 'react';
import plusFill from '@iconify/icons-eva/plus-fill';
import { Link as RouterLink } from 'react-router-dom';
// material
import {
  Card,
  Table,
  Stack,
  Avatar,
  Button,
  Checkbox,
  TableRow,
  TableBody,
  TableCell,
  Container,
  Typography,
  TableContainer,
  TablePagination
} from '@mui/material';
// components
import Page from '../components/Page';
import Label from '../components/Label';
import Scrollbar from '../components/Scrollbar';
import SearchNotFound from '../components/SearchNotFound';
import { UserListHead, UserListToolbar, UserMoreMenu } from '../components/_dashboard/user';
//
import USERLIST from '../_mocks_/user';

// ----------------------------------------------------------------------

const TABLE_HEAD = [
  { orderID: 'OrderID', label: "Order", alignRight:false},
  // { userID: 'UserID', label: 'User', alignRight: false},
  { gallonsRequested: 'GallonsRequested', label: 'Gallons Requested', alignRight: false },
  { deliveryAddress: 'DeliveryAddress', label: 'Delivery Address', alignRight: false },
  { deliveryDate: 'DeliveryDate', label: 'Delivery Date', alignRight: false },
  { suggestedPrice: 'SuggestedPrice', label: 'Suggested Price', alignRight: false }
];

// ----------------------------------------------------------------------

function descendingComparator(a, b, orderBy) {
  if (b[orderBy] < a[orderBy]) {
    return -1;
  }
  if (b[orderBy] > a[orderBy]) {
    return 1;
  }
  return 0;
}

function getComparator(order, orderBy) {
  return order === 'desc'
    ? (a, b) => descendingComparator(a, b, orderBy)
    : (a, b) => -descendingComparator(a, b, orderBy);
}

function applySortFilter(array, comparator, query) {
  const stabilizedThis = array.map((el, index) => [el, index]);
  stabilizedThis.sort((a, b) => {
    const order = comparator(a[0], b[0]);
    if (order !== 0) return order;
    return a[1] - b[1];
  });
  if (query) {
    return filter(array, (_user) => _user.userID.toLowerCase().indexOf(query.toLowerCase()) !== -1);
  }
  return stabilizedThis.map((el) => el[0]);
}

export default function User() {
  const [page, setPage] = useState(0);
  const [order, setOrder] = useState('asc');
  const [selected, setSelected] = useState([]);
  const [orderBy, setOrderBy] = useState('orderID');
  const [filterUserID, setFilterUserID] = useState('');
  const [rowsPerPage, setRowsPerPage] = useState(5);

  // Gets the user currently logged in so only relevant rows are shown
  //   Security-wise, probably not the best, because data for other users is
  // technically all still loaded in, they just don't have rows on the table
  const [userLoggedIn, setUserLoggedIn] = useState('1');


  // GET ONLY THE ORDERS FROM THE RIGHT CUSTOMER
  const RELEVANT_ORDERS = USERLIST.filter(x => x.userID === userLoggedIn);


  const handleRequestSort = (event, property) => {
    const isAsc = orderBy === property && order === 'asc';
    setOrder(isAsc ? 'desc' : 'asc');
    setOrderBy(property);
  };

  const handleSelectAllClick = (event) => {
    if (event.target.checked) {
      const newSelecteds = RELEVANT_ORDERS.map((n) => n.name);
      setSelected(newSelecteds);
      return;
    }
    setSelected([]);
  };

  const handleClick = (event, name) => {
    const selectedIndex = selected.indexOf(name);
    let newSelected = [];
    if (selectedIndex === -1) {
      newSelected = newSelected.concat(selected, name);
    } else if (selectedIndex === 0) {
      newSelected = newSelected.concat(selected.slice(1));
    } else if (selectedIndex === selected.length - 1) {
      newSelected = newSelected.concat(selected.slice(0, -1));
    } else if (selectedIndex > 0) {
      newSelected = newSelected.concat(
        selected.slice(0, selectedIndex),
        selected.slice(selectedIndex + 1)
      );
    }
    setSelected(newSelected);
  };

  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(parseInt(event.target.value, 10));
    setPage(0);
  };

  const handleFilterByUserID = (event) => {
    setFilterUserID(event.target.value);
  };

  const emptyRows = page > 0 ? Math.max(0, (1 + page) * rowsPerPage - RELEVANT_ORDERS.length) : 0;

  const filteredUsers = applySortFilter(RELEVANT_ORDERS, getComparator(order, orderBy), filterUserID);

  const isUserNotFound = filteredUsers.length === 0;

  return (
    <Page title="User | Minimal-UI">
      <Container>
        <Stack direction="row" alignItems="center" justifyContent="space-between" mb={5}>
          <Typography variant="h4" gutterBottom>
            Quote History
          </Typography>
        </Stack>

        <Card>
          <UserListToolbar
            numSelected={selected.length}
            filterName={filterUserID}
            onFilterName={handleFilterByUserID}
          />

          <Scrollbar>
            <TableContainer sx={{ minWidth: 800 }}>
              <Table>
                <UserListHead
                  order={order}
                  orderBy={orderBy}
                  headLabel={TABLE_HEAD}
                  rowCount={RELEVANT_ORDERS.length}
                  numSelected={selected.length}
                  onRequestSort={handleRequestSort}
                  onSelectAllClick={handleSelectAllClick}
                />
                <TableBody>
                  {filteredUsers
                    .slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
                    .map((row) => {
                      const { orderID, userID, gallonsRequested, deliveryAddress, deliveryDate, suggestedPrice } = row;
                      const isItemSelected = selected.indexOf(userID) !== -1;
                      
                      // Return row based on ternary operation
                      return userID === userLoggedIn ? (
                        <TableRow
                          hover
                          key={userID}
                          tabIndex={-1}
                          selected={isItemSelected}
                        >
                          <TableCell padding="checkbox">
                          </TableCell>

                          {<TableCell align='left'>{orderID}</TableCell>}
                          {/* {<TableCell align='left'>{userID}</TableCell>} */}
                          {<TableCell align='left'>{gallonsRequested}</TableCell>}
                          {<TableCell align='left'>{deliveryAddress}</TableCell>}
                          {<TableCell align='left'>{deliveryDate}</TableCell>}
                          {<TableCell align='left'>{"$"+suggestedPrice} </TableCell>}
                          {/* <TableCell align="left">{isVerified ? 'Yes' : 'No'}</TableCell> */}
                          {/* <TableCell align="left">
                            <Label
                              variant="ghost"
                              color={(status === 'banned' && 'error') || 'success'}
                            >
                              {sentenceCase(status)}
                            </Label>
                          </TableCell> */}

                          <TableCell align="right">
                            {/* <UserMoreMenu /> */}
                          </TableCell>
                        </TableRow>
                      )

                      :

                      null;
                      // End ternary operation

                    })}
                  {emptyRows > 0 && (
                    <TableRow style={{ height: 53 * emptyRows }}>
                      <TableCell colSpan={6} />
                    </TableRow>
                  )}
                </TableBody>
                {isUserNotFound && (
                  <TableBody>
                    <TableRow>
                      <TableCell align="center" colSpan={6} sx={{ py: 3 }}>
                        <SearchNotFound searchQuery={filterUserID} />
                      </TableCell>
                    </TableRow>
                  </TableBody>
                )}
              </Table>
            </TableContainer>
          </Scrollbar>

          <TablePagination
            rowsPerPageOptions={[5, 10, 25]}
            component="div"
            count={RELEVANT_ORDERS.length}
            rowsPerPage={rowsPerPage}
            page={page}
            onPageChange={handleChangePage}
            onRowsPerPageChange={handleChangeRowsPerPage}
          />
        </Card>
      </Container>
    </Page>
  );
}
