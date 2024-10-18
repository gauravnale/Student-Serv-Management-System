// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from 'react';
import { Link } from 'react-router-dom';
import './ForgotPassword.css';
import logo from '../../img/logo_2.png';

function ForgotPassword() {
  return (
    <div>
        <form>
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
            <div className="container"  style={{backgroundColor:"#f1f1f1"}} >
                <h2>Reset Password </h2>
                <br/>
                <label><b>Enter Your Email ID</b></label>
                <input type="text"  placeholder="Enter EmailID" style={{width: "30%", marginLeft: "5%"}} name="uname" />
                <br/>
                <button type="submit" style={{marginLeft: "10%",backgroundColor:"green",width:"12%"}}>
                    <Link to="/ChangePassword" style={{textDecoration: "none",color:"white"}}>
                        Send Email
                    </Link>
                </button>
                <p>
                    *An email will be sent to your address with a reset password you can use to access your account.
                </p>
            </div>
        </form>
    </div>
  );
}

export default ForgotPassword;
