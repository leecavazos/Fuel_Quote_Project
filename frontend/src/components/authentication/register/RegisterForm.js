import * as Yup from 'yup';
import * as React from "react";
import { AutoComplete, ComboBox, MultiColumnComboBox, DropDownList, MultiSelect, DropDownTree } from '@progress/kendo-react-dropdowns';
import { useState } from 'react';
import MenuItem from '@mui/material/MenuItem'
import { Icon } from '@iconify/react';
import { useFormik, Form, FormikProvider } from 'formik';
import eyeFill from '@iconify/icons-eva/eye-fill';
import eyeOffFill from '@iconify/icons-eva/eye-off-fill';
import { useNavigate } from 'react-router-dom';
// material
import { Stack, TextField, IconButton, InputAdornment } from '@mui/material';
import { LoadingButton } from '@mui/lab';
import { values } from 'lodash';
import Box from '@mui/material/Box';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';
// import { Dropdown, Menu } from 'semantic-ui-react'

// ----------------------------------------------------------------------

export default function RegisterForm() {
  const navigate = useNavigate();
  const [showPassword, setShowPassword] = useState(false);
  const [selectedState, setSelectedState] = useState("");

  const stateChanged = (event) =>{
    setSelectedState(event.target.value);
  }

  const RegisterSchema = Yup.object().shape({
    firstName: Yup.string()
      .min(2, 'Too Short!')
      .max(25, 'Too Long!')
      .required('First name required'),
    lastName: Yup.string().min(2, 'Too Short!').max(25, 'Too Long!').required('Last name required'),
    Address: Yup.string().min(2, 'Too Short!').max(100, 'Too Long').required('Address is required'),
    State: Yup.string().required("State is required"),
    City: Yup.string().min(2, 'Too Short!').max(100, 'Too Long').required('City is required'),
    ZipCode: Yup.string().min(5, 'Too Short!').max(9, 'Too Long').required('ZipCode is required'),
    email: Yup.string().email('Email must be a valid email address').required('Email is required'),
    password: Yup.string().required('Password is required')
  });

  const formik = useFormik({
    initialValues: {
      firstName: '',
      lastName: '',
      Address: '',
      State: '',
      City: '',
      ZipCode: '',
      email: '',
      password: ''
    },

    validationSchema: RegisterSchema,
    onSubmit: async() => {
      const data = formik.values;
      const options = {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
      };
      fetch('/api/Registration', options).then(res => {
        console.log(res);
      });
      navigate('/dashboard', { replace: true });
    }
  });


  const { errors, touched, handleSubmit, isSubmitting, getFieldProps } = formik;

  // List of options for the state
  const SelectStates = [
    {value: 'AL', label: 'AL - Alabama'},
    {value: 'AK', label: 'AK - Alaska'},
    {value: 'AZ', label: 'AZ - Arizona'},
    {value: 'AR', label: 'AR - Arkansas'},
    {value: 'CA', label: 'CA - California'},
    {value: 'CO', label: 'CO - Colorado'},
    {value: 'CT', label: 'CT - Connecticut'},
    {value: 'DE', label: 'DE - Delaware'},
    {value: 'FL', label: 'FL - Florida'},
    {value: 'GA', label: 'GA - Georgia'},
    {value: 'HI', label: 'HI - Hawaii'},
    {value: 'ID', label: 'ID - Idaho'},
    {value: 'IL', label: 'IL - Illinois'},
    {value: 'IN', label: 'IN - Indiana'},
    {value: 'IA', label: 'IA - Iowa'},
    {value: 'KS', label: 'KS - Kansas'},
    {value: 'KY', label: 'KY - Kentucky'},
    {value: 'LA', label: 'LA - Louisiana'},
    {value: 'ME', label: 'ME - Maine'},
    {value: 'MD', label: 'MD - Maryland'},
    {value: 'MA', label: 'MA - Massachusetts'},
    {value: 'MI', label: 'MI - Michigan'},
    {value: 'MN', label: 'MN - Minnesota'},
    {value: 'MS', label: 'MS - Mississippi'},
    {value: 'MO', label: 'MO - Missouri'},
    {value: 'MT', label: 'MT - Montana'},
    {value: 'NE', label: 'NE - Nebraska'},
    {value: 'NV', label: 'NV - Nevada'},
    {value: 'NH', label: 'NH - New Hampshire'},
    {value: 'NJ', label: 'NJ - New Jersey'},
    {value: 'NM', label: 'NM - New Mexico'},
    {value: 'NY', label: 'NY - New York'},
    {value: 'NC', label: 'NC - North Carolina'},
    {value: 'ND', label: 'ND - North Dakota'},
    {value: 'OH', label: 'OH - Ohio'},
    {value: 'OK', label: 'OK - Oklahoma'},
    {value: 'OR', label: 'OR - Oregon'},
    {value: 'PA', label: 'PA - Pennsylvania'},
    {value: 'RI', label: 'RI - Rhode Island'},
    {value: 'SC', label: 'SC - South Carolina'},
    {value: 'SD', label: 'SD - South Dakota'},
    {value: 'TN', label: 'TN - Tennessee'},
    {value: 'TX', label: 'TX - Texas'},
    {value: 'UT', label: 'UT - Utah'},
    {value: 'VA', label: 'VA - Virginia'},
    {value: 'VT', label: 'VT - Vermont'},
    {value: 'WA', label: 'WA - Washington'},
    {value: 'WI', label: 'WI - Wisconsin'},
    {value: 'WV', label: 'WV - West Virginia'},
    {value: 'WY', label: 'WY - Wyoming'}
  ]  

  return (
    <FormikProvider value={formik}>
      <Form autoComplete="off" noValidate onSubmit={handleSubmit}>
        <Stack spacing={3}>
          <Stack direction={{ xs: 'column', sm: 'row' }} spacing={2}>
            <TextField
              fullWidth
              label="First name"
              {...getFieldProps('firstName')}
              error={Boolean(touched.firstName && errors.firstName)}
              helperText={touched.firstName && errors.firstName}
            />

            <TextField
              fullWidth
              label="Last name"
              {...getFieldProps('lastName')}
              error={Boolean(touched.lastName && errors.lastName)}
              helperText={touched.lastName && errors.lastName}
            />
          </Stack>

          <TextField
            fullWidth
            autoComplete="address"
            type="Address"
            label="Address"
            {...getFieldProps('Address')}
            error={Boolean(touched.Address && errors.Address)}
            helperText={touched.Address && errors.Address}
          />

          <TextField
            select
            label="State"
            value={selectedState}
            onChange={stateChanged}
            type="State"
            {...getFieldProps('State')}
            error={Boolean(touched.State && errors.State)}
            helperText={touched.State && errors.State}
          >
            {SelectStates.map((option) => (
              <MenuItem key={option.value} value={option.value}>
                {option.label}
              </MenuItem>
            ))}
          </TextField>

          <Stack direction={{ xs: 'column', sm: 'row' }} spacing={2}>
            <TextField
              fullWidth
              autoComplete = "city"
              type = "City"
              label = "City"
              {...getFieldProps('City') }
              error = { Boolean(touched.City && errors.City) }
              helperText = { touched.City && errors.City }
            />

            <TextField
              fullWidth
              autoComplete = "zipcode"
              type = "ZipCode"
              label = "ZipCode"
              {...getFieldProps('ZipCode') }
              error = { Boolean(touched.ZipCode && errors.ZipCode) }
              helperText = { touched.ZipCode && errors.ZipCode }
            />
        </Stack>

        <TextField
          fullWidth
          autoComplete = "username"
          type = "email"
          label = "Email address"
          {...getFieldProps('email') }
          error = { Boolean(touched.email && errors.email) }
          helperText = { touched.email && errors.email }
        />

        <TextField
          fullWidth
          autoComplete = "current-password"
          type = { showPassword ? 'text' : 'password' }
          label = "Password" {...getFieldProps('password') }
          InputProps = {
            {
              endAdornment: (
                <InputAdornment position = "end" >
                  <IconButton edge = "end"
                    onClick = {
                        () => setShowPassword((prev) => !prev)
                    } >
                    <Icon icon = { showPassword ? eyeFill : eyeOffFill }/>
                  </IconButton>
                </InputAdornment>
              )
            }
          }
        error = { Boolean(touched.password && errors.password) }
        helperText = { touched.password && errors.password }
        />

        <LoadingButton
          fullWidth
          size = "large"
          type = "submit"
          variant = "contained"
          loading = { isSubmitting } >
          Register
        </LoadingButton>
        </Stack>
        </Form>
        </FormikProvider>
  );
}