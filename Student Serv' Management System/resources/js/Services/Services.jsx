// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import logo from '../../img/logo_2.png';
import search from '../../img/icons8-search-30.png';
import noun from '../../img/noun-exchange-155086.png';
import club from '../../img/noun-club-2594990.png';
import trade from '../../img/noun-trade-1180449.png';
import './Services.css';
import {Link} from 'react-router-dom'

function Services() {
  return (
    <div className="">
      <header>
        <div className="inner">
          <div className="logo">
            <div>
              <Link to="/">
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
      <h2 style={{textAlign: "center",color: "#1e1e47"}}>SERVICES</h2>
    <div className="row">
      <div className="card">
        <img
          src={noun}
          alt="John"
          style={{width: "50%", height: "200px", margin: "auto"}}
        />
        <h3>Exchanh information with yours peers</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc
          scelerisque viverra mauris in aliquam sem fringilla. Nisl condimentum
          id venenatis a. Magna eget est lorem ipsum dolor sit amet.
        </p>
      </div>

      <div className="card">
        <img
          src={club}
          alt="John"
          style={{width: "43%", height: "200px", margin: "auto"}}
        />
        <h3>Chech out the clubs on the campus</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc
          scelerisque viverra mauris in aliquam sem fringilla. Nisl condimentum
          id venenatis a. Magna eget est lorem ipsum dolor sit amet.
        </p>
      </div>

      <div className="card">
        <img
          src={trade}
          alt="John"
          style={{width: "35%", height: "200px", margin: "auto"}}
        />
        <h3>Trade books and other things with your peers</h3>
        <p style={{textAlign: "justify"}}>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc
          scelerisque viverra mauris in aliquam sem fringilla. Nisl condimentum
          id venenatis a. Magna eget est lorem ipsum dolor sit amet.
        </p>
      </div>
    </div>
    <footer
      style={{
        textAlign: "center",
        backgroundColor: "rgb(241, 241, 241)",
        padding: "5px",
        marginTop: "400px"
      }}
    >
      <div className="footer-center">
        <div>
          <p>
            <span style={{color:"#FFFFF"}}>444 S. Cooper , </span> Arlington, Texas, 76013
          </p>
        </div>
        <div>
          {/* <i class="fa fa-envelope"></i> */}
          <p>
            <a href="mailto:support@MercadoEscolar.com"
              >support@MercadoEscolar.com</a>
          </p>
        </div>
      </div>
    </footer>
    </div>
  )
}

export default Services;