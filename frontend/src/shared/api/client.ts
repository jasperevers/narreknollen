// api/client.ts
const BASE_URL = "https://denarreknollen.nl/wp-json/wp/v2";

export async function fetchAPI<T>(endpoint: string): Promise<T> {
    const res = await fetch(`${BASE_URL}/${endpoint}`);

    if (!res.ok) {
        throw new Error(`API error: ${res.status}`);
    }

    return res.json();
}