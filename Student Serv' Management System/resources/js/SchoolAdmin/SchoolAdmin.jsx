// Gaurav Nale - 1001859699
// Srihari Meka - 1002030377
// Varsha Nanajipuram - 1002039829 
import logo from "../../img/logo_2.png";
import notification from "../../img/noun-notification-1594309.png";
import email from "../../img/noun-email-2516396.png";
import account from "../../img/noun-account-1559576.png";
import search from "../../img/noun-search-3548595.png";
import club from "../../img/noun-club-2594990.png";
import conversation from "../../img/noun-business-conversation-763888.png";
import complaint from "../../img/noun-complaint-202590.png";
import alert from "../../img/noun-alert-887235.png";
import "./style_school.css";
import { Link } from "react-router-dom";

function SchoolAdmin() {
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
           <Link to="/Sch-profile"> <img className="head-logo" src={account} /></Link>
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
        <div className="main-title">
          <p className="font-weight-bold">DASHBOARD</p>
        </div>

        <div className="main-cards">
          <div className="card">
            <div className="card-inner">
              <p className="text-primary">CLUBS</p>
              <span className="material-icons-outlined text-blue">
                <img className="pro-logo" src={club} />
              </span>
            </div>
            <span className="text-primary font-weight-bold">49</span>
          </div>

          <div className="card">
            <div className="card-inner">
              <p className="text-primary">OWNER ALERTS</p>
              <span className="material-icons-outlined text-orange">
                <img className="pro-logo" src={conversation} />
              </span>
            </div>
            <span className="text-primary font-weight-bold">8</span>
          </div>

          <div className="card">
            <div className="card-inner">
              <p className="text-primary">COMPLAINTS</p>
              <span className="material-icons-outlined text-green">
                <img className="pro-logo" src={complaint} />
              </span>
            </div>
            <span className="text-primary font-weight-bold">10</span>
          </div>

          <div className="card">
            <div className="card-inner">
              <p className="text-primary">INVENTORY ALERTS</p>
              <span className="material-icons-outlined text-red">
                <img className="pro-logo" src={alert} />
              </span>
            </div>
            <span className="text-primary font-weight-bold">5</span>
          </div>
        </div>

        <div className="charts">
          <div className="charts-card">
            <p className="chart-title">Main Reports</p>
            <div id="bar-chart">Generate Reports</div>
          </div>

          <div className="charts-card">
            <p className="chart-title">Daily Reports</p>
            <div id="area-chart">Generate Reports</div>
          </div>
        </div>
      </main>
    </div>
  );
}
export default SchoolAdmin;
