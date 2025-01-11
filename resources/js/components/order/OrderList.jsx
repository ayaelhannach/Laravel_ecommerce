import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { addOrder, removeOrder } from '../../Redux/actions';
import axios from 'axios';
import './OrderList.css';

const OrderList = () => {
  const dispatch = useDispatch();
  const orders = useSelector(state => state.order.orders);

  useEffect(() => {
    axios.get('http://localhost:8000/orders')  
      .then(response => {
        response.data.forEach(order => {
          dispatch(addOrder(order));
        });
      })
      .catch(error => console.error('Error fetching orders:', error));
  }, [dispatch]);

  const handleRemove = (id) => {
    dispatch(removeOrder(id));
  };

  return (
    <div className="order-list">
      <h3>Liste des Commandes</h3>
      <ul>
        {orders.map(order => (
          <li key={order.id}>
            {order.productName} - {order.quantity}
            <button onClick={() => handleRemove(order.id)}>Supprimer</button>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default OrderList;
