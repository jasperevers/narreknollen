import { useEffect, useState } from "react";
import { NavLink } from "react-router-dom";
import "./navbar.css";

export default function Navbar() {
    const [scrolled, setScrolled] = useState(false);
    const [open, setOpen] = useState(false);

    useEffect(() => {
        const onScroll = () => setScrolled(window.scrollY > 20);
        window.addEventListener("scroll", onScroll);
        return () => window.removeEventListener("scroll", onScroll);
    }, []);

    const toggleMenu = () => setOpen((prev) => !prev);

    const closeMenu = () => setOpen(false);

    return (
        <nav className={`navbar ${scrolled ? "navbar--scrolled" : ""}`}>
            <div className="navbar__container">

                <div className="navbar__logo">
                    Narre Knollen
                </div>

                {/* hamburger button */}
                <button className="navbar__toggle" onClick={toggleMenu}>
                    ☰
                </button>

                {/* menu */}
                <div className={`navbar__links ${open ? "is-open" : ""}`}>
                    <NavLink to="/" onClick={closeMenu}>Home</NavLink>
                    <NavLink to="/events" onClick={closeMenu}>Events</NavLink>
                </div>

            </div>
        </nav>
    );
}