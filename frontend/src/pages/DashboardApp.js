// // material
// import { Box, Grid, Container, Typography } from '@mui/material';
// // components
// import Page from '../components/Page';
// import {
//   AppTasks,
//   AppNewUsers,
//   AppBugReports,
//   AppItemOrders,
//   AppNewsUpdate,
//   AppWeeklySales,
//   AppOrderTimeline,
//   AppCurrentVisits,
//   AppWebsiteVisits,
//   AppTrafficBySite,
//   AppCurrentSubject,
//   AppConversionRates
// } from '../components/_dashboard/app';

// // ----------------------------------------------------------------------

// export default function DashboardApp() {
//   return (
//     <Page title="Dashboard | Minimal-UI">
//       <Container maxWidth="xl">
//         <Box sx={{ pb: 5 }}>
//           <Typography variant="h4">Hi, Welcome back</Typography>
//         </Box>
//         <Grid container spacing={3}>
//           <Grid item xs={12} sm={6} md={3}>
//             <AppWeeklySales />
//           </Grid>
//           <Grid item xs={12} sm={6} md={3}>
//             <AppNewUsers />
//           </Grid>
//           <Grid item xs={12} sm={6} md={3}>
//             <AppItemOrders />
//           </Grid>
//           <Grid item xs={12} sm={6} md={3}>
//             <AppBugReports />
//           </Grid>

//           <Grid item xs={12} md={6} lg={8}>
//             <AppWebsiteVisits />
//           </Grid>

//           <Grid item xs={12} md={6} lg={4}>
//             <AppOrderTimeline />
//           </Grid>

//           <Grid item xs={12} md={6} lg={8}>
//             <AppConversionRates />
//           </Grid>

//           <Grid item xs={12} md={6} lg={4}>
//             <AppCurrentSubject />
//           </Grid>

//           <Grid item xs={12} md={6} lg={8}>
//             <AppNewsUpdate />
//           </Grid>

//           <Grid item xs={12} md={6} lg={4}>
//             <AppCurrentVisits />
//           </Grid>

//           {/* <Grid item xs={12} md={6} lg={4}>
//             <AppTrafficBySite />
//           </Grid> */}

//           {/* <Grid item xs={12} md={6} lg={8}>
//             <AppTasks />
//           </Grid> */}
//         </Grid>
//       </Container>
//     </Page>
//   );
// }

import { Link as RouterLink } from 'react-router-dom';
// material
import { styled } from '@mui/material/styles';
import { Card, Stack, Link, Container, Box, Typography } from '@mui/material';
// layouts
import AuthLayout from '../layouts/AuthLayout';
// components
import Page from '../components/Page';
import { MHidden } from '../components/@material-extend';
import { FuelForm } from '../components/authentication/fuel';
import AuthSocial from '../components/authentication/AuthSocial';
import {
  AppTasks,
  AppNewUsers,
  AppBugReports,
  AppItemOrders,
  AppNewsUpdate,
  AppWeeklySales,
  AppOrderTimeline,
  AppCurrentVisits,
  AppWebsiteVisits,
  AppTrafficBySite,
  AppCurrentSubject,
  AppConversionRates
} from '../components/_dashboard/app';

// ----------------------------------------------------------------------

const RootStyle = styled(Page)(({ theme }) => ({
  [theme.breakpoints.up('md')]: {
    display: 'flex'
  }
}));

const SectionStyle = styled(Card)(({ theme }) => ({
  width: '100%',
  maxWidth: 464,
  display: 'flex',
  flexDirection: 'column',
  justifyContent: 'center',
  margin: theme.spacing(2, 0, 2, 2)
}));

const ContentStyle = styled('div')(({ theme }) => ({
  maxWidth: 480,
  margin: 'auto',
  display: 'flex',
  minHeight: '100vh',
  flexDirection: 'column',
  justifyContent: 'center',
  padding: theme.spacing(12, 0)
}));

// ----------------------------------------------------------------------

export default function Fuel() {
  return (
    <RootStyle title="Fuel | Minimal-UI">
      {/* <MHidden width="mdDown">
        <SectionStyle>
          <Typography variant="h3" sx={{ px: 5, mt: 10, mb: 5 }}>
            Welcome!
          </Typography>
          <img src="/static/illustrations/illustration_login.png" alt="login" />
          <img src="/static/illustrations/illustration_fuel.png" alt="fuel" />
        </SectionStyle>
      </MHidden> */}

      <Container maxWidth="xl">
          <Box sx={{ mb: 5 }}>
              <Typography variant="h4">Get a Fuel Quote!</Typography>
            {/* <Typography variant="h4" gutterBottom>
              Get a Fuel Quote
            </Typography> */}
            <Typography sx={{ color: 'text.secondary' }}>Enter how many gallons you are requesting and the delivery date.</Typography>
            <Typography variant="subtittle 4" sx={{ mt: 3, textAlign: 'left', color: 'text.secondary' }}>
                Looking for your previous quotes?&nbsp;
                <Link to="/dashboard/user" component={RouterLink}>
                  Login
                </Link>
              </Typography>
          </Box>
          <FuelForm/>
      </Container>
    </RootStyle>
  );
}
