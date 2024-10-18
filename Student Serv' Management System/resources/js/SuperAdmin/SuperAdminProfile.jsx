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

import { BsPlus, BsTrash } from "react-icons/bs";
import { FaChevronDown } from "react-icons/fa";
import { CgComment } from "react-icons/cg";

import "../Bussiness//Bussiness.css";
// import "./StudentProfile.css";

import model from "../../img/model.png";

function SuperAdminProfile() {
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
            <Link to="/SuperAdminProfile">
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
            <span className="material-icons-outlined">Super Admin</span>
          </div>
          <span className="material-icons-outlined">close</span>
        </div>

        <ul className="sidebar-list">
        <li className="sidebar-list-item">
            <Link to="/SuperAdmin">Dashboard</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Super-admin-Students">Manage Students</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Super-admin-Bs">Manage Businesses</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Super-admin-sch">Manage School admin</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/">Log out</Link>
          </li>
        </ul>
      </aside>

      <main className="main-container">
        <div>
          <p>Name: Bod White</p>
          <p>School: School of law</p>
          <p>Email: Bob.white@mavs.uta.edu</p>
        </div>
        <form className="student-profile-form">
          <div className="text1-1">
            <p>
              Name: <input type="text" />
            </p>
            <p>
              School: <input type="text" />
            </p>
            <p>
              Email:
              <input type="text"  />
            </p>
          </div>
          <button
            style={{ width: "20%", backgroundColor: "blue"}}
          >
            Edit Profile
          </button>
        </form>
      </main>
    </div>
  );
}

export default SuperAdminProfile;
