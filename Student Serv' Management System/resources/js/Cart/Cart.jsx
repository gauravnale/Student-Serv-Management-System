// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from 'react';
import { Link } from 'react-router-dom';
import './Cart.css';
import chair from '../../img/chair3.jpeg';
import drawer from '../../img/drawer.jpeg';


function Cart() {
    return (
        <div className="CartContainer">
            <div className="Header">
                <h3 className="Heading">Shopping Cart</h3>
                <h5 className="Action">Remove all</h5>
            </div>

            <div className="Cart-Items">
                <div className="image-box">
                    <img src={chair} style={{height: "120px"}} />
                </div>
                <div className="about">
                    <h1 className="title">Wooden Chair</h1>
                    <h3 className="subtitle">Size M</h3>
                </div>
                <div className="counter">
                    <div className="btn">+</div>
                    <div className="count">1</div>
                    <div className="btn">-</div>
                </div>
                <div className="prices">
                    <div className="amount">$12.99</div>
                    <div className="save"><u>Save for later</u></div>
                    <div className="remove"><u>Remove</u></div>
                </div>
            </div>

            <div className="Cart-Items pad">
                <div className="image-box">
                    <img src={drawer} style={{height: "120px"}} />
                </div>
                <div className="about">
                    <h1 className="title">Wood Drawer</h1>
                    <h3 className="subtitle">20 inches</h3>
                </div>
                <div className="counter">
                    <div className="btn">+</div>
                    <div className="count">1</div>
                    <div className="btn">-</div>
                </div>
                <div className="prices">
                    <div className="amount">$23.99</div>
                    <div className="save"><u>Save for later</u></div>
                    <div className="remove"><u>Remove</u></div>
                </div>
            </div>
            <hr />
            <div className="checkout">
                <div className="total">
                <div>
                    <div className="Subtotal">Sub-Total</div>
                    <div className="items">2 items</div>
                </div>
                <div className="total-amount">$37</div>
                </div>
                <button className="button">
                    <Link to="/Payment" style={{textDecoration: "none", color: "black"}}>Checkout</Link>
                </button>
            </div>
        </div>
    )
}


export default Cart;