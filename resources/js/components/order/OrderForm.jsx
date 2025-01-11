import React, { useState } from 'react';
import { useDispatch } from 'react-redux';
import { addOrder } from '../../Redux/actions';
import './OrderForm.css';

const OrderForm = () => {
  const [order, setOrder] = useState({ productName: '', quantity: '' });
  const dispatch = useDispatch();

  const handleSubmit = (e) => {
    e.preventDefault();
    dispatch(addOrder({ ...order, id: Date.now() }));
    setOrder({ productName: '', quantity: '' });
  };

  return (
    <div className="order-form">
      <h3>Ajouter une Commande</h3>
      <form onSubmit={handleSubmit}>
        <label>Produit:</label>
        <input
          type="text"
          value={order.productName}
          onChange={(e) => setOrder({ ...order, productName: e.target.value })}
        />
        <label>Quantité:</label>
        <input
          type="number"
          value={order.quantity}
          onChange={(e) => setOrder({ ...order, quantity: e.target.value })}
        />
        <button type="submit">Ajouter Commande</button>
      </form>
    </div>
  );
};

export default OrderForm;
