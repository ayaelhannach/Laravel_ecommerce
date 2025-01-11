import React from 'react';
import Header from './components/home/Header';
import AccueilContent from './components/home/AccueilContent';
import Footer from './components/home/Footer';
import ProductList from './components/product/ProductList';
import ProductForm from './components/product/ProductForm';
import { Route, BrowserRouter as Router, Switch } from 'react-router-dom';
import './App.css';

const App = () => {
  return (
    <Router>
      <div className="app">
        <Header />
        <div className="content">
          <Switch>
            <Route path="/" exact component={AccueilContent} />
            <Route path="/product" exact component={ProductList} />
            <Route path="/add-product" component={ProductForm} />
          </Switch>
        </div>
        <Footer />
      </div>
    </Router>
  );
};

export default App;
