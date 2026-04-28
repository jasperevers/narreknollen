import type {ReactNode} from "react";

export default function MainLayout({ children }: { children: ReactNode }) {
    return (
        <>
            {/* hier komt later je navbar */}
            <main>{children}</main>
            <footer style={{ textAlign: "center", padding: "20px" }}>
                © 2026 De Narre Knollen
            </footer>
        </>
    );
}