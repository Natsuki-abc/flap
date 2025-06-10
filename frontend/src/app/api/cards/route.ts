import { NextRequest, NextResponse } from "next/server";

const API_BASE = process.env.BACKEND_API_URL || "http://localhost:8000/api";

export async function GET() {
  const res = await fetch(`${API_BASE}/cards`, {
    headers: { 'Accept': 'application/json' },
    cache: 'no-store',
  });
  const data = await res.json();
  return NextResponse.json(data, { status: res.status });
}
