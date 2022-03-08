import * as Yup from 'yup';
import { useState } from 'react';
import { Link as RouterLink, useNavigate } from 'react-router-dom';
import { useFormik, Form, FormikProvider } from 'formik';
import { Icon } from '@iconify/react';
import eyeFill from '@iconify/icons-eva/eye-fill';
import eyeOffFill from '@iconify/icons-eva/eye-off-fill';
// material
import {
  Link,
  Stack,
  Checkbox,
  TextField,
  IconButton,
  InputAdornment,
  FormControlLabel
} from '@mui/material';
import { LoadingButton } from '@mui/lab';

// ----------------------------------------------------------------------

export default function FuelForm() {
  const navigate = useNavigate();
  //const [showPassword, setShowPassword] = useState(false);

  const FuelSchema = Yup.object().shape({
    Gallons: Yup.number().required('Number is required').positive('Number must be positive'),
    // Address: Yup.string().min(2, 'Too Short!').max(100, 'Too Long').required('Address is required'),
    // SuggestedPrice: Yup.number().required()
    DeliveryDate: Yup.string().required('Date is required')
  });

  const formik = useFormik({
    initialValues: {
      Gallons: null,
      Address: '',
      SuggestedPrice: null,
      DeliveryDate: '',
      remember: true
    },
    validationSchema: FuelSchema,
    onSubmit: () => {
      navigate('/dashboard', { replace: true });
    }
  });

  const { errors, touched, values, isSubmitting, handleSubmit, getFieldProps } = formik;

  return (
    <FormikProvider value={formik}>
      <Form autoComplete="off" noValidate onSubmit={handleSubmit}>
        <Stack spacing={3}>
          <TextField
            fullWidth
            autoComplete="off"
            type="Gallons"
            label="Gallons Requested"
            {...getFieldProps('Gallons')}
            error={Boolean(touched.Gallons && errors.Gallons)}
            helperText={touched.Gallons && errors.Gallons}
          />

          <TextField
            fullWidth
            type = "Address"
            label="Delivery Address: "
            {...getFieldProps('Address')}
            contentEditable= {false}
            error={Boolean(touched.Address && errors.Address)}
            helperText={touched.Address && errors.Address}
          />

          <TextField
            fullWidth
            type = "Date"
            label="Delivery date"
            {...getFieldProps('Date')}
            InputLabelProps={{shrink:true}}
            contentEditable= {false}
            error={Boolean(touched.DeliveryDate && errors.DeliveryDate)}
            helperText={touched.DeliveryDate && errors.DeliveryDate}
          />

          <TextField
            fullWidth
            autoComplete="off"
            label="Suggested Price: $"
            {...getFieldProps('SuggestedPrice')}
            error={Boolean(touched.SuggestedPrice && errors.SuggestedPrice)}
            helperText={touched.SuggestedPrice && errors.SuggestedPrice}
          />

          <LoadingButton
            fullWidth
            size="large"
            type="submit"
            variant="contained"
            loading={isSubmitting}
          >
            Submit
          </LoadingButton>
        </Stack>
      </Form>
    </FormikProvider>
  );
}