// Initial states for Products, Orders, and Customers
const initialState = {
    products: [],
    orders: [],
    customers: [],
  };
  
  // Combined reducer for Products, Orders, and Customers
  const rootReducer = (state = initialState, action) => {
    switch (action.type) {
      // Products Actions
      case 'ADD_PRODUCT':
        return {
          ...state,
          products: [...state.products, action.payload],
        };
      case 'REMOVE_PRODUCT':
        return {
          ...state,
          products: state.products.filter(product => product.id !== action.payload),
        };
  
      // Orders Actions
      case 'ADD_ORDER':
        return {
          ...state,
          orders: [...state.orders, action.payload],
        };
      case 'REMOVE_ORDER':
        return {
          ...state,
          orders: state.orders.filter(order => order.id !== action.payload),
        };
  
      // Customers Actions
      case 'ADD_CUSTOMER':
        return {
          ...state,
          customers: [...state.customers, action.payload],
        };
      case 'REMOVE_CUSTOMER':
        return {
          ...state,
          customers: state.customers.filter(customer => customer.id !== action.payload),
        };
  
      default:
        return state;
    }
  };
  
  export default rootReducer;
  