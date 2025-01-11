import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { addCustomer, removeCustomer } from '../../Redux/actions';
import axios from 'axios';
import './CustomerList.css';

const CustomerList = () => {
  const dispatch = useDispatch();
  const customers = useSelector(state => state.customer.customers);

  useEffect(() => {
    axios.get('http://localhost:8000/customers')  
      .then(response => {
        response.data.forEach(customer => {
          dispatch(addCustomer(customer));
        });
      })
      .catch(error => console.error('Error fetching customers:', error));
  }, [dispatch]);

  const handleRemove = (id) => {
    dispatch(removeCustomer(id));
  };

  return (
    <div className="customer-list">
      <h3>Liste des Clients</h3>
      <ul>
        {customers.map(customer => (
          <li key={customer.id}>
            {customer.name} - {customer.email}
            <button onClick={() => handleRemove(customer.id)}>Supprimer</button>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CustomerList;
