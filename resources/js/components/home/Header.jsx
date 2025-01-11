import React from 'react';
import { Link } from 'react-router-dom';
import './Header.css';

const Header = () => {
  return (
    <header className="header">
      <nav>
        <ul>
          <li><Link to="/">Accueil</Link></li>
          <li><Link to="/product">Produit</Link></li>
          <li><Link to="/customer">Customer</Link></li>
          <li><Link to="/order">Commande</Link></li>
          <li><Link to="/contact">Contact</Link></li>
        </ul>
      </nav>
    </header>
  );
};

export default Header;
