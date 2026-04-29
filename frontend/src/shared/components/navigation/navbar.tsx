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

    // body scroll lock wanneer menu open is
    useEffect(() => {
        document.body.style.overflow = open ? "hidden" : "auto";
    }, [open]);

    return (
        <>
            <nav className={`navbar ${scrolled ? "navbar--scrolled" : ""}`}>
                <div className="navbar__container">

                    <div className="navbar__logo">
                        Narre Knollen
                    </div>

                    <button
                        className="navbar__toggle"
                        onClick={() => setOpen((p) => !p)}
                    >
                        ☰
                    </button>

                    <div className="navbar__links desktop">
                        <NavLink to="/">Home</NavLink>
                        <NavLink to="/events">Events</NavLink>
                    </div>

                </div>
            </nav>

            {/* MOBILE OVERLAY MENU */}
            <div className={`mobileMenu ${open ? "open" : ""}`}>

                {/* dim background */}
                <div
                    className="mobileMenu__overlay"
                    onClick={() => setOpen(false)}
                />

                {/* menu panel */}
                <div className="mobileMenu__panel">
                    <NavLink to="/" onClick={() => setOpen(false)}>Home</NavLink>
                    <NavLink to="/events" onClick={() => setOpen(false)}>Events</NavLink>
                </div>

            </div>
        </>
    );
}