// Actions for Products
export const addProduct = (product) => {
    return {
      type: 'ADD_PRODUCT',
      payload: product,
    };
  };
  
  export const removeProduct = (id) => {
    return {
      type: 'REMOVE_PRODUCT',
      payload: id,
    };
  };
  
  // Actions for Orders
  export const addOrder = (order) => {
    return {
      type: 'ADD_ORDER',
      payload: order,
    };
  };
  
  export const removeOrder = (id) => {
    return {
      type: 'REMOVE_ORDER',
      payload: id,
    };
  };
  
  // Actions for Customers
  export const addCustomer = (customer) => {
    return {
      type: 'ADD_CUSTOMER',
      payload: customer,
    };
  };
  
  export const removeCustomer = (id) => {
    return {
      type: 'REMOVE_CUSTOMER',
      payload: id,
    };
  };
  