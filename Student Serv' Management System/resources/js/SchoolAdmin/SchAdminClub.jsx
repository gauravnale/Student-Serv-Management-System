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

import robo from "../../img/robo.png";
import fitness from "../../img/fitness.jpg";
import advantage from "../../img/mav-advantage-icon-Community-engagement.jpg";

// import "./style2.css";



import { AiFillEdit } from "react-icons/ai";
import { BsPlus, BsTrash, BsFillCartFill } from "react-icons/bs";
import { FaChevronDown } from "react-icons/fa";
import { CgComment } from "react-icons/cg";

import model from "../../img/model.png";

function SchAdminClub() {
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
            <Link to="/Sch-profile">
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
            <span className="material-icons-outlined">School Admin</span>
          </div>
          <span className="material-icons-outlined">close</span>
        </div>

        <ul className="sidebar-list">
          <li className="sidebar-list-item">
            <Link to="/SchoolAdmin">Dashboard</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Sch-Students">Manage Students</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Sch-Bs">Manage Businesses</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Sch-Clubs">Manage Clubs</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/Sch-Advert">Manage Ads</Link>
          </li>
          <li className="sidebar-list-item">
            <Link to="/">Log out</Link>
          </li>
        </ul>
      </aside>

      <main className="main-container">
        <div className="past-products">
          <h2 className="clubs-h2">Clubs</h2>
          <table className="sch-club-table">
            <tr>
              <th>Name</th>
              <th>Image</th>
              <th>People</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>Robotics Club</td>
              <td>
                <img
                  src={robo}
                  alt="John"
                  style={{ width: "20%", margin: "auto" }}
                />
              </td>
              <td>13</td>
              <td className="club-btns">
                <button className="mg-club-btns-leave">Remove</button>
              </td>
            </tr>
            <tr>
              <td>Fitness Club</td>
              <td>
                <img
                  src={fitness}
                  alt="John"
                  style={{ width: "20%", margin: "auto" }}
                />
              </td>
              <td>123</td>
              <td className="club-btns">
                <button className="mg-club-btns-leave">Remove</button>
              </td>
            </tr>
          </table>
        </div>
      </main>
    </div>
  );
}

export default SchAdminClub;
