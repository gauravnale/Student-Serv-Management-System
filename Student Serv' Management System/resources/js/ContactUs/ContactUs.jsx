// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from 'react';
import './ContactUs.css';
import logo from '../../img/logo_2.png';
import {Link} from 'react-router-dom';

function ContactUs() {
    return (
        <div className="Contact-CartContainer">
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

            <div className="container">
                <div style={{textAlign: "center"}}>
                    <h1>Contact Us</h1>
                </div>
                <form className='contact-form'>
                    <div>
                        <label for="fname">First Name*</label>
                        <input
                            type="text"
                            required="required"
                            id="fname"
                            name="firstname"
                            placeholder="Your name.."
                        />
                    </div>
                    <div>
                        <label for="lname">Last Name*</label>
                        <input
                            type="text"
                            required="required"
                            id="lname"
                            name="lastname"
                            placeholder="Your last name.."
                        />
                    </div>
                    <div>
                        <label for="EmailID">Email ID*</label>
                        <input
                            type="email"
                            required="required"
                            id="EmailID"
                            name="EmailID"
                            placeholder="Your Email ID..."
                        />
                    </div>
                    <div>
                        <label for="subject">Message*</label>
                        <textarea
                            type="text"
                            required="required"
                            id="subject"
                            name="subject"
                            placeholder="Type your message..."
                            
                        ></textarea>
                    </div>
                    <input type="submit" value="Submit" />
                </form>
            </div>

            <footer style={{textAlign: "center",backgroundColor: "rgb(241, 241, 241)",padding: "15px",marginTop: "140px"}}>
                <div className="footer-center">
                    <div>
                        <p>
                            <span style={{color:"#FFFFF"}}>444 S. Cooper , </span> Arlington, Texas, 76013
                        </p>
                    </div>
                    <div>
                        {/* <i class="fa fa-envelope"></i> */}
                        <p>
                            <a href="mailto:support@MercadoEscolar.com">
                                support@MercadoEscolar.com
                            </a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    )
}


export default ContactUs;