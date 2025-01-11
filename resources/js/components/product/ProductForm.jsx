import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { addProduct, removeProduct } from '../../Redux/actions';
import axios from 'axios';
import './ProductList.css';

const ProductList = () => {
  const dispatch = useDispatch();
  const products = useSelector(state => state.product.products);

  useEffect(() => {
    axios.get('http://localhost:8000/products')  // Update the API endpoint
      .then(response => {
        response.data.forEach(product => {
          dispatch(addProduct(product));
        });
      })
      .catch(error => console.error('Error fetching products:', error));
  }, [dispatch]);

  const handleRemove = (id) => {
    dispatch(removeProduct(id));
  };

  return (
    <div className="product-list">
      <h3>Liste des Produits</h3>
      <ul>
        {products.map(product => (
          <li key={product.id}>
            {product.name} - ${product.price}
            <button onClick={() => handleRemove(product.id)}>Supprimer</button>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default ProductList;
