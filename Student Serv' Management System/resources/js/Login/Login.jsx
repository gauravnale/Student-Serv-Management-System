// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import React from "react";
import "./Login.css";
import logo from "../../img/logo_2.png";
import { Link } from "react-router-dom";

function Login() {
  return (
    <div className="login-component">
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

        <div className="container" style={{ backgroundColor: "#f1f1f1" }}>
          <h2>Enter your credentials</h2>
          <label>
            {" "}
            <b>Username</b>{" "}
          </label>
          <input
            type="text"
            placeholder="Enter Username"
            style={{ width: "20%", marginLeft: "5%" }}
            name="uname"
          />
          <br />
          <label>
            {" "}
            <b>Password</b>{" "}
          </label>
          <input
            type="password"
            placeholder="Enter Password"
            style={{ width: "20%", marginLeft: "5%" }}
            name="psw"
          />{" "}
          <br />
          <button
            type="submit"
            style={{
              backgroundColor: "rgb(10,119,13)",
              width: "10%",
              marginLeft: "10%",
            }}
          >
            Login
          </button>
          <span style={{ marginLeft: "5%", textDecoration: "none" }}>
            {" "}
            <Link to="/ForgotPassword">Forgot password?</Link>
          </span>
        </div>
        <button
          className="signup"
          style={{
            backgroundColor: "rgb(6, 170, 211)",
            width: "15%",
            marginLeft: "40%",
          }}
        >
          <Link to="/SignUp" style={{ textDecoration: "none", color: "white" }}>
            Sign Up
          </Link>
        </button>
      </form>

      <footer
        style={{
          textAlign: "center",
          backgroundColor: "rgb(241, 241, 241)",
          padding: "25px",
          marginTop: "300px",
        }}
      >
        <div className="footer-center">
          <div>
            <p>
              <span style={{ color: "#FFFFF" }}>444 S. Cooper , </span>{" "}
              Arlington, Texas, 76013
            </p>
          </div>
          <div>
            <p>
              <a href="mailto:support@MercadoEscolar.com">
                support@MercadoEscolar.com
              </a>
            </p>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default Login;
