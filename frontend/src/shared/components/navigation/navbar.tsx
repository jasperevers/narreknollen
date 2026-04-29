import { NavLink } from "react-router-dom";
import "./navbar.css";
import {useEffect, useState} from "react";

export default function Navbar() {
    const [scrolled, setScrolled] = useState(false);

    useEffect(() => {
        const onScroll = () => setScrolled(window.scrollY > 20);
        window.addEventListener("scroll", onScroll);
        return () => window.removeEventListener("scroll", onScroll);
    }, []);

    return (
        <nav className={`navbar ${scrolled ? "navbar--scrolled" : ""}`}>
            <div className="navbar__container">

                <div className="navbar__logo">
                    Narre Knollen
                </div>

                <div className="navbar__links">
                    <NavLink to="/" className="navlink">Home</NavLink>
                    <NavLink to="/events" className="navlink">Events</NavLink>
                </div>

            </div>
        </nav>
    );
}