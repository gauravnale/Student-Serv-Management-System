// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from 'react';
import { Link } from 'react-router-dom';
import './SignUp.css';
import logo from "../../img/logo_2.png";

function SignUp() {
  return (
    <div>
        <form>
        <nav className='contact-nav'>
                <Link to="/"><img src={logo} width="15%" /></Link>
                <div className="nav-links">
                    <ul className='contact-ul'>
                        <li>
                            <span>
                                <a href="http://localhost:3000/" target="_blank">BLOG</a>
                            </span>
                        </li>
                        <li><Link to="/">HOME</Link></li>
                        <li><Link to="/about">ABOUT US</Link></li>
                        <li><Link to="/services">SERVICES</Link></li>
                        <li><Link to="/ContactUs">CONTACT</Link></li>
                        <li><Link to="/Login">PROFILE</Link></li>
                        <li><Link to="/cart">CART</Link></li>
                    </ul>
                </div>
            </nav>
            <div className="formContainer">
                <div style={{textAlign: "center;"}}>
                    <h1>Create an Account</h1>
                </div>
                <div>
                    <label for="FName"><b>First Name*</b></label>
                    <input type="text" placeholder="Enter your First Name" name="FName" />

                    <label for="LName"><b>Last Name*</b></label>
                    <input type="text" placeholder="Enter your Last Name" name="LName" />
                </div>
                <div>
                    <label for="email"><b>Email*</b></label>
                    <input type="text" placeholder="Enter your EmailID" name="email" />
                </div>
                <div>
                <label for="role"><b>Select role*</b></label>
                  <select style={{marginLeft:"3%"}}>
                    <option>Select role</option>
                    <option>Student</option>
                    <option>Business owner</option>
                    <option>School admin</option>
                    <option>Super admin</option>
                  </select>
                </div>
                <div>
                    <label for="password"><b>Password*</b></label>
                    <input type="password" className={{marginLeft: "6%"}} placeholder="Enter Password" name="password" />
                </div>
                <div>
                    <label for="repeatPassword"><b>Repeat Password*</b></label>
                    <input type="password" placeholder="Repeat Password" name="repeatPassword" />
                </div>
                <div>
                    <label>
                        <input type="checkbox" checked="checked" name="remember" style={{marginBottom:"15px"}}/> 
                        I agree to the terms and conditions.
                    </label>
                </div>
                <div style={{textAlign: "center"}}>
                    <button type="submit" className="signup" style={{backgroundColor: "rgb(83, 158, 2)"}}>Sign Up</button>
                    <button style={{backgroundColor:"rgb(6, 170, 211)", width: "200px", marginLeft: "20px"}}>
                        <Link to="/Login" style={{textDecoration: "none", color:"white"}}>Login Instead</Link>
                    </button>
                </div>
            </div>
        </form>

        <footer style={{textAlign: "center",backgroundColor: "rgb(241, 241, 241)", padding: "25px", marginTop: "300px"}}>
            <div className="footer-center">
                <div>
                    <p><span style={{color:"#FFFFF"}}>444 S. Cooper , </span> Arlington, Texas, 76013</p>
                </div>
                <div>
                    <p><a href="mailto:support@MercadoEscolar.com">support@MercadoEscolar.com</a></p>
                </div>
            </div>
        </footer>
    </div>

  );
}

export default SignUp;
