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
// import "./Bussiness.css";

import { AiFillEdit } from "react-icons/ai";
import { BsPlus, BsTrash } from "react-icons/bs";
import { FaChevronDown } from "react-icons/fa";
import { CgComment } from "react-icons/cg";

import model from "../../img/model.png";

function StudentAdvert() {
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
            <img className="head-logo" src={email} />
          </span>
          <span className="material-icons-outlined">
            <img className="head-logo" src={account} />
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
          <div className="ad-card">
            <img
              src={ecommerce}
              alt="John"
              style={{ height: "7rem", width: "100%" }}
            />
            <div>
              <h5>Advert3</h5>
              <p>
                In publishing and graphic design, Lorem ipsum is a placeholder
                text commonly used to demonstrate
              </p>
              <button className="add-button1">
                <AiFillEdit />
              </button>
              <button className="add-button2">
                <BsTrash />
              </button>
            </div>
          </div>

          <div className="ad-card">
            <img
              src={shoe}
              alt="John"
              style={{ height: "7rem", width: "100%" }}
            />
            <div>
              <h5>Advert2</h5>
              <p>
                In publishing and graphic design, Lorem ipsum is a placeholder
                text commonly used to demonstrate
              </p>
              <button className="add-button1">
                <AiFillEdit />
              </button>
              <button className="add-button2">
                <BsTrash />
              </button>
            </div>
          </div>

          <div className="ad-card">
            <img
              src={makeup}
              alt="John"
              style={{ height: "7rem", width: "100%" }}
            />
            <div>
              <h5>Advert3</h5>
              <p>
                In publishing and graphic design, Lorem ipsum is a placeholder
                text commonly used to demonstrate
              </p>
              <button className="add-button1">
                <AiFillEdit />
              </button>
              <button className="add-button2">
                <BsTrash />
              </button>
            </div>
          </div>
        </div>
        <div>
          <form className="product-form">
            <h5>Add/Edit Ads</h5>
            <h6>
              Ad Name: <input type="text" />
            </h6>
            <h6>
              Add Description:{" "}
              <textarea type="text" placeholder="description" />
            </h6>
            <h6>
              Ad Image: <input type="file" />
            </h6>
            <button>Submit</button>
          </form>
        </div>
      </main>
    </div>
  );
}

export default StudentAdvert;
