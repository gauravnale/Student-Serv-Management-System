// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
// import './Home.css';
import logo from '../../img/logo_2.png';
import search from '../../img/icons8-search-30.png';
import sofa from '../../img/sofa.png';
// import './style1.css';
import {Link} from 'react-router-dom'

function Home() {
  return (
    <div>
      <header>
        <div className="inner">
          <div className="logo">
            <div>
              <Link href="/">
                <img src={logo} />
              </Link>
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
      </header>
      <section className="body">
        <div className="text-box" style={{display:"flex", alignItems:"center", justifyContent:"space-between",marginLeft:"1rem"}}>
          <div>
          <h1>
            Welcome To <br />
            New Shoping Experience
          </h1>
          <h3>by University of Texas Marketplace</h3>
          <div className="btn1">
            <Link to="/Login" className="hero-btn">
              {" "}
              Shop Now{" "}
            </Link>
          </div>
          </div>
        
        </div>

        <div className="text2">
          <h3>Feature product</h3>
          <h1>Comfy Chair</h1>
          <p>
            When an unknown printer took a galley of type and scrambled it to
            make a type specimen book.
            <br />
            Excepteur sint occaecat cupidatat non proident,
            <br />
            sunt in culpa qui officia.
          </p>
          <h2>Only $50</h2>
          <div className="btn2">
            <Link to="/Login" className="hero-btn">
              {" "}
              Buy Now{" "}
            </Link>
          </div>
        </div>

        <div className="text3">
          <h3>Feature product</h3>
          <h1>Authentic Teacups</h1>
          <p>
            When an unknown printer took a galley of type and scrambled it to
            make it better.
            <br />
            Excepteur sint occaecat cupidatat non proident,
            <br />
            sunt in culpa qui officia.
          </p>
          <h2>Only $30</h2>
          <div className="btn3">
            <Link href="/Login" className="hero-btn">
              Buy Now
            </Link>
          </div>
        </div>
      </section>
      <footer
        style={{
          textAlign: "center",
          backgroundColor: "rgb(241, 241, 241)",
          padding: "15px",
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
            <i className="fa fa-envelope"></i>
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

export default Home;
