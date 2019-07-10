from queue import Queue

class Solution(object):
    def numIslands(self, grid):
        try:
            r = 0; m = len(grid); n = len(grid[0])
            around = ((0, 1), (1, 0), (0, -1), (-1, 0))
        except:
            return 0

        for i in range(m):
            for j in range(n):
                if int(grid[i][j]):
                    r += 1

                    #---------------------------BFS 开始-----------------------------
                    # 1.把根节点投入队列
                    q = Queue()
                    q.put((i, j))

                    # 开始循环
                    while not q.empty():
                        # 取出还未沉没的陆地节点并沉没陆地（防止下次遍历到的时候再算一遍）
                        x, y = q.get()

                        if int(grid[x][y]):
                            grid[x][y] = '0'

                            # 放入周围的陆地节点
                            for a, b in around:
                                a += x; b += y;
                                if 0 <= a < m and 0 <= b < n and int(grid[a][b]):
                                    q.put((a, b))
                    #----------------------------------------------------------------
        return r
