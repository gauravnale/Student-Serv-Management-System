// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from 'react';
// import './Login.css';
// import './About.css'
import logo from '../../img/logo_2.png';
import search from '../../img/icons8-search-30.png';
import {Link} from 'react-router-dom'

function About() {
  return (
    <div>
        <header>
        <div className="inner">
          <div className="logo">
            <div>
              <a href="index.html">
                <img src={logo} />
              </a>
            </div>
          </div>
          <nav>
            <li>
              <input type="text" placeholder="Search Here" name="q" />
            </li>
            <li>
              <span>
                <img src={search} alt="search" />
              </span>
            </li>
            <li>
              <span>
                <a href="http://pxp6320.uta.cloud/me/blog" target="_blank">
                  BLOG
                </a>
              </span>
            </li>
            <li>
              <span>
                <Link to="/">HOME</Link>
              </span>
            </li>
            <li>
              <span>
                <Link to="/about">ABOUT US</Link>
              </span>
            </li>
            <li>
              <span>
                <Link to="/services">SERVICES</Link>
              </span>
            </li>
            <li>
              <span>
                <Link to="/contactUs">CONTACT</Link>
              </span>
            </li>
            <li>
              <span>
                <Link to="/Login">PROFILE</Link>
              </span>
            </li>
            <li>
              <span>
                <Link to="/cart">CART</Link>
              </span>
            </li>
          </nav>
        </div>

            <div className="about-section">
                <div className="inner-container">
                    <h1>About Us</h1>
                    <p className="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada
                        proin. Tempor orci dapibus ultrices in iaculis nunc sed augue. Nulla
                        at volutpat diam ut venenatis tellus in metus vulputate. Etiam non
                        quam lacus suspendisse faucibus interdum. Sodales neque sodales ut
                        etiam sit amet nisl. Eleifend mi in nulla posuere sollicitudin
                        aliquam. Diam maecenas ultricies mi eget mauris pharetra et. Ipsum a
                        arcu cursus vitae congue mauris rhoncus. Scelerisque felis imperdiet
                        proin fermentum leo.
                    </p>
                    <div className="skills">
                        <span>IEEE Certified</span>
                        <span>Best Customer Satisfaction</span>
                        <span>Trusted community</span>
                    </div>
                </div>
            </div>
        </header>
    </div>
  );
}

export default About;
