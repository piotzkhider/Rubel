import React from 'react';
import {Link} from 'react-router';

export default class Navbar extends React.Component {
  render() {
    return (
      <aside className="column is-2 aside hero is-fullheight is-hidden-mobile">
        <div>
          <div className="main">
            <div className="title">Main</div>
            <Link to="/dashboard" className="item active">
              <span className="icon">
                <i className="fa fa-home"></i>
              </span>
              <span className="name">Dashboard</span>
            </Link>
            <Link to="/dashboard/posts" className="item active">
              <span className="icon">
                <i className="fa fa-home"></i>
              </span>
              <span className="name">Posts</span>
            </Link>
            <Link to="/dashboard/new-post" className="item active">
              <span className="icon">
                <i className="fa fa-map-marker"></i>
              </span>
              <span className="name">NewPost</span>
            </Link>
            <Link to="/dashboard/categories" className="item active">
              <span className="icon">
                <i className="fa fa-th-list"></i>
              </span>
              <span className="name">Categories</span>
            </Link>
            <Link to="/dashboard/tags" className="item active">
              <span className="icon">
                <i className="fa fa-folder-o"></i>
              </span>
              <span className="name">Tags</span>
            </Link>
            <Link to="/dashboard/config" className="item active">
              <span className="icon">
                <i className="fa fa-folder-o"></i>
              </span>
              <span className="name">Config</span>
            </Link>
          </div>
        </div>
      </aside>
    )
  }
}
