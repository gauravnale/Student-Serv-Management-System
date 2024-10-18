// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import { Link } from "react-router-dom";
import logo from "../../img/logo_2.png";
import notification from "../../img/noun-notification-1594309.png";
import email from "../../img/noun-email-2516396.png";
import account from "../../img/noun-account-1559576.png";
import search from "../../img/noun-search-3548595.png";
import club from "../../img/noun-club-2594990.png";
import conversation from "../../img/noun-business-conversation-763888.png";
import complaint from "../../img/noun-complaint-202590.png";
import alert from "../../img/noun-alert-887235.png";
import ecommerce from "../../img/ecommerce-3530785__480.jpg";
import shoe from "../../img/running-shoe-371625_1280.jpg";
import makeup from "../../img/make-up-1984115__480.jpg";

import { AiFillEdit } from "react-icons/ai";
import { BsPlus, BsTrash, BsFillCartFill } from "react-icons/bs";
import { FaChevronDown } from "react-icons/fa";
import { CgComment } from "react-icons/cg";

import model from "../../img/model.png";

function StudentProducts() {
  return (
    <div className="grid-container">
      <header className="header">
        <div className="menu-icon">
          <span className="material-icons-outlined">menu</span>
        </div>
        <div className="header-left">
          <img className="logo" src={logo} />
        </div>
        <div className="header-right">
          <span className="material-icons-outlined">
            <img className="head-logo" src={notification} />
          </span>
          <span className="material-icons-outlined">
            <Link to="/cart">
              <BsFillCartFill />
            </Link>
          </span>
          <span className="material-icons-outlined">
            <Link>
              <img className="head-logo" src={account} />
            </Link>
          </span>
          <span className="material-icons-outlined">
            <img className="head-logo" src={search} />
          </span>
        </div>
      </header>

      <aside id="sidebar">
        <div className="sidebar-title">
          <div className="sidebar-brand">
            <span className="material-icons-outlined">Student</span>
          </div>
          <span className="material-icons-outlined">close</span>
        </div>

        <ul className="sidebar-list">
          <li className="sidebar-list-item">
            <Link to="/StudentProducts">Products</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/StudentClubs">Clubs</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/StudentAdvert">Ads</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/">Log out</Link>
          </li>
        </ul>
      </aside>

      <main className="main-container">
        <div className="bs-row">
          <div className="product-card">
            <img
              src={ecommerce}
              alt="John"
              style={{ width: "50%", margin: "auto" }}
            />
            <div>
              <h5>Product1</h5>
              <p>$130</p>
              <button className="student-product-button1">Add to cart</button>
              {/* <p>
                <button className="button2">
                  <BsTrash />
                </button>
              </p> */}
            </div>
          </div>

          <div className="product-card">
            <img
              src={shoe}
              alt="John"
              style={{ width: "50%", margin: "auto" }}
            />
            <div>
              <h5>Product2</h5>
              <p>$130</p>
              <button className="student-product-button1">Add to cart</button>
              {/* <p>
                <button className="button2">
                  <BsTrash />
                </button>
              </p> */}
            </div>
          </div>

          <div className="product-card">
            <img
              src={makeup}
              alt="John"
              style={{ width: "50%", margin: "auto" }}
            />
            <div>
              <h5>Product3</h5>
              <p>$130</p>
              <button className="student-product-button1">Add to cart</button>
              {/* <p>
                <button className="button2">
                  <BsTrash />
                </button>
              </p> */}
            </div>
          </div>
        </div>
        {/* <div>
          <form className="product-form">
            <h5>Add/Edit product</h5>
            <h6>
              Product Name: <input type="text" />
            </h6>
            <h6>
              Product Price: <input type="text" />
            </h6>
            <h6>
              Product Image: <input type="file" />
            </h6>
            <button>Submit</button>
          </form>
        </div> */}
        <div className="past-products">
          <h4>Past products</h4>
          <table>
            <tr>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
            </tr>
            <tr>
              <td>Product1</td>
              <td>
              <img
              src={ecommerce}
              alt="John"
              style={{ width: "20%", margin: "auto" }}
            />
              </td>
              <td>$130</td>
              <td>
              <button className="product-btns-return">Return</button>
              </td>
            </tr>
            <tr>
              <td>Product2</td>
              <td>
              <img
              src={shoe}
              alt="John"
              style={{ width: "20%", margin: "auto" }}
            />
              </td>
              <td>$130</td>
              <td>
              <button className="product-btns-return">Return</button>
              </td>
            </tr>
          </table>
        </div>
      </main>
    </div>
  );
}

export default StudentProducts;
