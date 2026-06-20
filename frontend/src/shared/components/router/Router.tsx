import { BrowserRouter, Routes, Route } from "react-router-dom";
import MainLayout from "../../../layouts/MainLayout";

import Home from "../../../pages/Home";

export default function Router() {
    return(
        <BrowserRouter>
            <Routes>

                {/* Layout wrapper */}
                <Route element={<MainLayout />}>

                    <Route path="/" element={<Home />} />

                </Route>

                {/* 404 */}
                <Route path="*" element={<p>pagina niet gevonden</p>} />

            </Routes>
        </BrowserRouter>
    )
}