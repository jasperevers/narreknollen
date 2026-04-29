import { Outlet } from "react-router-dom";
import Navbar from "../shared/components/navigation/navbar.tsx";

export default function MainLayout() {
    return (
        <>
            <Navbar />
            <main><Outlet /></main>
            <footer style={{ textAlign: "center", padding: "20px" }}>
                © 2026 De Narre Knollen
            </footer>
        </>
    );
}