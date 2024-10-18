// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from 'react';
import './Payment.css';
import logo from '../../img/logo_2.png';
import {Link} from 'react-router-dom'

function Payment(){
    return (
        <div>
            <nav className="contact-nav">
          <Link to="/">
            <img src={logo} width="15%" />
          </Link>
          <div className="nav-links">
            <ul className="contact-ul">
              <li>
                <span>
                  <a href="http://localhost:3000/" target="_blank">
                    BLOG
                  </a>
                </span>
              </li>
              <li>
                <Link to="/">HOME</Link>
              </li>
              <li>
                <Link to="/about">ABOUT US</Link>
              </li>
              <li>
                <Link to="/services">SERVICES</Link>
              </li>
              <li>
                <Link to="/ContactUs">CONTACT</Link>
              </li>
              <li>
                <Link to="/Login">PROFILE</Link>
              </li>
              <li>
                <Link to="/cart">CART</Link>
              </li>
            </ul>
          </div>
        </nav>
            <div className="payment-row">
                <div className="col-75">
                    <div className="container">
                        <form>
                            <div style={{textAlign: "center"}}>
                                <h3>Cart Checkout</h3>
                            </div>
                            <br/>
                            <br/>

                            <div className="payment-row-2">
                            <div className="col-50">
                                <h5>Billing Address</h5>
                                <br/>
                                <label for="fname"> Full Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="John Smith" required="required"/>
                                <label for="email"> Email</label>
                                <input type="text" id="email" name="email" required="required" placeholder="john@example.com"/>
                                <label for="adr"> Address</label>
                                <input type="text" id="adr" name="address" required="required" placeholder="412 Nedderman Dr"/>
                                <label for="city"> City</label>
                                <input type="text" id="city" name="city" required="required" placeholder="Arlington"/>

                                <div className="row">
                                    <div className="col-50">
                                        <label for="state">State</label>
                                        <input type="text" required="required" id="state" name="state" placeholder="TX"/>
                                    </div>
                                    <div className="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" required="required" name="zip" placeholder="10001"/>
                                    </div>
                                </div>
                            </div>

                            <div className="col-50">
                                <h5>Payment</h5>
                                <br/>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" required="required" placeholder="John Smith"/>
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber" required="required" placeholder="1111-2222-3333-4444"/>
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" required="required" placeholder="September"/>
                                <div className="row">
                                    <div className="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" required="required" name="expyear" placeholder="2018"/>
                                    </div>
                                    <div className="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" required="required" name="cvv" placeholder="352"/>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <label>Shipping address same as billing</label>
                                <input type="checkbox" name="sameadr"/>
                            <input type="submit" value="Proceed to Pay" className="btn"/>
                        </form>
                    </div>
                </div>
                <div className="col-25">
                    <div className="container">
                        <h4>Cart <span className="price" style={{color:"black"}}> <b>4</b></span></h4>
                        <p><a href="#">Product 1</a> <span className="price">$15</span></p>
                        <p><a href="#">Product 2</a> <span className="price">$5</span></p>
                        <p><a href="#">Product 3</a> <span className="price">$8</span></p>
                        <p><a href="#">Product 4</a> <span className="price">$2</span></p>
                        <hr/>
                        <p>Total <span className="price" style={{color:"black"}}><b>$30</b></span></p>
                    </div>
                </div>
            </div>

            <footer style={{textAlign: "center", backgroundColor:" rgb(241, 241, 241)", padding: "20px", marginTop: "20px",width: "100%"}}>
                <div className="footer-center">
                    <div>
                        <p><span style={{color:"#FFFFF"}}>444 S. Cooper , </span> Arlington, Texas, 76013</p>
                    </div>
                    <div>
                        {/* <i class="fa fa-envelope"></i> */}
                        <p><a href="mailto:support@MercadoEscolar.com">support@MercadoEscolar.com</a></p>
                    </div>
                </div>
            </footer>
        </div>
    )
}

export default Payment