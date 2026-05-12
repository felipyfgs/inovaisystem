# Frontend (Nuxt 4) — development image.
# Production builds should use a multi-stage Dockerfile that runs `nuxt build`
# and serves the Nitro output with `node .output/server/index.mjs`.
FROM node:24-bookworm-slim

ENV NODE_ENV=development \
    HOST=0.0.0.0 \
    PORT=3000

WORKDIR /app

# Install pnpm (matching the version pinned in package.json) and copy lockfiles
# first to maximise layer caching.
RUN corepack enable && corepack prepare pnpm@10.33.4 --activate

COPY package.json pnpm-lock.yaml pnpm-workspace.yaml ./
RUN pnpm install --frozen-lockfile

COPY . .

EXPOSE 3000

CMD ["pnpm", "run", "dev"]
